<?php
namespace Dkd\PhpCmis\DataObjects;

/**
 * This file is part of php-cmis-lib.
 *
 * (c) Sascha Egerer <sascha.egerer@dkd.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Dkd\PhpCmis\Data\CmisExtensionElementInterface;
use Dkd\PhpCmis\Data\ExtensionDataInterface;

/**
 * Holds extension data either set by the CMIS repository or the client.
 */
abstract class AbstractExtensionData implements ExtensionDataInterface
{
    /**
     * @var CmisExtensionElementInterface[]
     */
    protected $extensions;

    /**
     * Returns the list of top-level extension elements.
     *
     * @return CmisExtensionElementInterface[]
     */
    public function getExtensions()
    {
        return $this->extensions;
    }

    /**
     * Sets the list of top-level extension elements.
     *
     * @param CmisExtensionElementInterface[] $extensions
     * @return void
     */
    public function setExtensions(array $extensions)
    {
        foreach ($extensions as $extension) {
            if (!$extension instanceof CmisExtensionElementInterface) {
                throw new \InvalidArgumentException(
                    sprintf(
                        'A given extension is of type "%s" which does not '
                        . 'implement required CmisExtensionElementInterface.',
                        get_class($extension)
                    )
                );
            }
        }

        $this->extensions = $extensions;
    }
}
