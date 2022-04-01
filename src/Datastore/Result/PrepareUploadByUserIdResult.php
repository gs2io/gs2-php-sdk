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

class PrepareUploadByUserIdResult implements IResult {
    /** @var DataObject */
    private $item;
    /** @var string */
    private $uploadUrl;

	public function getItem(): ?DataObject {
		return $this->item;
	}

	public function setItem(?DataObject $item) {
		$this->item = $item;
	}

	public function withItem(?DataObject $item): PrepareUploadByUserIdResult {
		$this->item = $item;
		return $this;
	}

	public function getUploadUrl(): ?string {
		return $this->uploadUrl;
	}

	public function setUploadUrl(?string $uploadUrl) {
		$this->uploadUrl = $uploadUrl;
	}

	public function withUploadUrl(?string $uploadUrl): PrepareUploadByUserIdResult {
		$this->uploadUrl = $uploadUrl;
		return $this;
	}

    public static function fromJson(?array $data): ?PrepareUploadByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new PrepareUploadByUserIdResult())
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