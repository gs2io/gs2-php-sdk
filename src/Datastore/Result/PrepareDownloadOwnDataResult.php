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

class PrepareDownloadOwnDataResult implements IResult {
    /** @var DataObject */
    private $item;
    /** @var string */
    private $fileUrl;
    /** @var int */
    private $contentLength;

	public function getItem(): ?DataObject {
		return $this->item;
	}

	public function setItem(?DataObject $item) {
		$this->item = $item;
	}

	public function withItem(?DataObject $item): PrepareDownloadOwnDataResult {
		$this->item = $item;
		return $this;
	}

	public function getFileUrl(): ?string {
		return $this->fileUrl;
	}

	public function setFileUrl(?string $fileUrl) {
		$this->fileUrl = $fileUrl;
	}

	public function withFileUrl(?string $fileUrl): PrepareDownloadOwnDataResult {
		$this->fileUrl = $fileUrl;
		return $this;
	}

	public function getContentLength(): ?int {
		return $this->contentLength;
	}

	public function setContentLength(?int $contentLength) {
		$this->contentLength = $contentLength;
	}

	public function withContentLength(?int $contentLength): PrepareDownloadOwnDataResult {
		$this->contentLength = $contentLength;
		return $this;
	}

    public static function fromJson(?array $data): ?PrepareDownloadOwnDataResult {
        if ($data === null) {
            return null;
        }
        return (new PrepareDownloadOwnDataResult())
            ->withItem(empty($data['item']) ? null : DataObject::fromJson($data['item']))
            ->withFileUrl(empty($data['fileUrl']) ? null : $data['fileUrl'])
            ->withContentLength(empty($data['contentLength']) && $data['contentLength'] !== 0 ? null : $data['contentLength']);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "fileUrl" => $this->getFileUrl(),
            "contentLength" => $this->getContentLength(),
        );
    }
}