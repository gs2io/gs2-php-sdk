<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Datastore\Result;

use Gs2\Core\Model\IResult;
use Gs2\Datastore\Model\DataObject;

/**
 * Result of prepareDownloadByUserIdAndDataObjectNameAndGeneration: Prepare data object for download by specifying user ID, object name, and generation
 *
 * @see https://docs.gs2.io/api_reference/datastore/sdk/#preparedownloadbyuseridanddataobjectnameandgeneration
 */
class PrepareDownloadByUserIdAndDataObjectNameAndGenerationResult implements IResult {
    /** @var DataObject Data object */
    private $item;
    /** @var string URL to download the file */
    private $fileUrl;
    /** @var int File size */
    private $contentLength;

    /** @return DataObject|null Data object */
	public function getItem(): ?DataObject {
		return $this->item;
	}

    /** @param DataObject|null $item Data object */
	public function setItem(?DataObject $item) {
		$this->item = $item;
	}

    /**
     * @param DataObject|null $item Data object
     * @return PrepareDownloadByUserIdAndDataObjectNameAndGenerationResult
     */
	public function withItem(?DataObject $item): PrepareDownloadByUserIdAndDataObjectNameAndGenerationResult {
		$this->item = $item;
		return $this;
	}

    /** @return string|null URL to download the file */
	public function getFileUrl(): ?string {
		return $this->fileUrl;
	}

    /** @param string|null $fileUrl URL to download the file */
	public function setFileUrl(?string $fileUrl) {
		$this->fileUrl = $fileUrl;
	}

    /**
     * @param string|null $fileUrl URL to download the file
     * @return PrepareDownloadByUserIdAndDataObjectNameAndGenerationResult
     */
	public function withFileUrl(?string $fileUrl): PrepareDownloadByUserIdAndDataObjectNameAndGenerationResult {
		$this->fileUrl = $fileUrl;
		return $this;
	}

    /** @return int|null File size */
	public function getContentLength(): ?int {
		return $this->contentLength;
	}

    /** @param int|null $contentLength File size */
	public function setContentLength(?int $contentLength) {
		$this->contentLength = $contentLength;
	}

    /**
     * @param int|null $contentLength File size
     * @return PrepareDownloadByUserIdAndDataObjectNameAndGenerationResult
     */
	public function withContentLength(?int $contentLength): PrepareDownloadByUserIdAndDataObjectNameAndGenerationResult {
		$this->contentLength = $contentLength;
		return $this;
	}

    public static function fromJson(?array $data): ?PrepareDownloadByUserIdAndDataObjectNameAndGenerationResult {
        if ($data === null) {
            return null;
        }
        return (new PrepareDownloadByUserIdAndDataObjectNameAndGenerationResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? DataObject::fromJson($data['item']) : null)
            ->withFileUrl(array_key_exists('fileUrl', $data) && $data['fileUrl'] !== null ? $data['fileUrl'] : null)
            ->withContentLength(array_key_exists('contentLength', $data) && $data['contentLength'] !== null ? $data['contentLength'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "fileUrl" => $this->getFileUrl(),
            "contentLength" => $this->getContentLength(),
        );
    }
}