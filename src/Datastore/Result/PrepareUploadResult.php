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
 * Result of prepareUpload: Prepare to upload Data Objects
 *
 * @see https://docs.gs2.io/api_reference/datastore/sdk/#prepareupload
 */
class PrepareUploadResult implements IResult {
    /** @var DataObject Data Object */
    private $item;
    /** @var string URL used to execute the upload process */
    private $uploadUrl;

    /** @return DataObject|null Data Object */
	public function getItem(): ?DataObject {
		return $this->item;
	}

    /** @param DataObject|null $item Data Object */
	public function setItem(?DataObject $item) {
		$this->item = $item;
	}

    /**
     * @param DataObject|null $item Data Object
     * @return PrepareUploadResult
     */
	public function withItem(?DataObject $item): PrepareUploadResult {
		$this->item = $item;
		return $this;
	}

    /** @return string|null URL used to execute the upload process */
	public function getUploadUrl(): ?string {
		return $this->uploadUrl;
	}

    /** @param string|null $uploadUrl URL used to execute the upload process */
	public function setUploadUrl(?string $uploadUrl) {
		$this->uploadUrl = $uploadUrl;
	}

    /**
     * @param string|null $uploadUrl URL used to execute the upload process
     * @return PrepareUploadResult
     */
	public function withUploadUrl(?string $uploadUrl): PrepareUploadResult {
		$this->uploadUrl = $uploadUrl;
		return $this;
	}

    public static function fromJson(?array $data): ?PrepareUploadResult {
        if ($data === null) {
            return null;
        }
        return (new PrepareUploadResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? DataObject::fromJson($data['item']) : null)
            ->withUploadUrl(array_key_exists('uploadUrl', $data) && $data['uploadUrl'] !== null ? $data['uploadUrl'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "uploadUrl" => $this->getUploadUrl(),
        );
    }
}