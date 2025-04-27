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

namespace Gs2\Deploy\Result;

use Gs2\Core\Model\IResult;

class PreUpdateStackResult implements IResult {
    /** @var string */
    private $uploadToken;
    /** @var string */
    private $uploadUrl;

	public function getUploadToken(): ?string {
		return $this->uploadToken;
	}

	public function setUploadToken(?string $uploadToken) {
		$this->uploadToken = $uploadToken;
	}

	public function withUploadToken(?string $uploadToken): PreUpdateStackResult {
		$this->uploadToken = $uploadToken;
		return $this;
	}

	public function getUploadUrl(): ?string {
		return $this->uploadUrl;
	}

	public function setUploadUrl(?string $uploadUrl) {
		$this->uploadUrl = $uploadUrl;
	}

	public function withUploadUrl(?string $uploadUrl): PreUpdateStackResult {
		$this->uploadUrl = $uploadUrl;
		return $this;
	}

    public static function fromJson(?array $data): ?PreUpdateStackResult {
        if ($data === null) {
            return null;
        }
        return (new PreUpdateStackResult())
            ->withUploadToken(array_key_exists('uploadToken', $data) && $data['uploadToken'] !== null ? $data['uploadToken'] : null)
            ->withUploadUrl(array_key_exists('uploadUrl', $data) && $data['uploadUrl'] !== null ? $data['uploadUrl'] : null);
    }

    public function toJson(): array {
        return array(
            "uploadToken" => $this->getUploadToken(),
            "uploadUrl" => $this->getUploadUrl(),
        );
    }
}