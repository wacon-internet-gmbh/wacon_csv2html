<?php
namespace Wacon\Csv2html\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Kerstin Schmitt <info@wacon.de>
 */
class ImportControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Wacon\Csv2html\Controller\ImportController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Wacon\Csv2html\Controller\ImportController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllImportsFromRepositoryAndAssignsThemToView()
    {

        $allImports = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $importRepository = $this->getMockBuilder(\Wacon\Csv2html\Domain\Repository\ImportRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $importRepository->expects(self::once())->method('findAll')->will(self::returnValue($allImports));
        $this->inject($this->subject, 'importRepository', $importRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('imports', $allImports);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }
}
