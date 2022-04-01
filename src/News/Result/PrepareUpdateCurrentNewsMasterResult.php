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

namespace Gs2\News\Result;

use Gs2\Core\Model\IResult;

class PrepareUpdateCurrentNewsMasterResult implements IResult {
    /** @var string */
    private $uploadToken;
    /** @var string */
    private $templateUploadUrl;

	public function getUploadToken(): ?string {
		return $this->uploadToken;
	}

	public function setUploadToken(?string $uploadToken) {
		$this->uploadToken = $uploadToken;
	}

	public function withUploadToken(?string $uploadToken): PrepareUpdateCurrentNewsMasterResult {
		$this->uploadToken = $uploadToken;
		return $this;
	}

	public function getTemplateUploadUrl(): ?string {
		return $this->templateUploadUrl;
	}

	public function setTemplateUploadUrl(?string $templateUploadUrl) {
		$this->templateUploadUrl = $templateUploadUrl;
	}

	public function withTemplateUploadUrl(?string $templateUploadUrl): PrepareUpdateCurrentNewsMasterResult {
		$this->templateUploadUrl = $templateUploadUrl;
		return $this;
	}

    public static function fromJson(?array $data): ?PrepareUpdateCurrentNewsMasterResult {
        if ($data === null) {
            return null;
        }
        return (new PrepareUpdateCurrentNewsMasterResult())
            ->withUploadToken(array_key_exists('uploadToken', $data) && $data['uploadToken'] !== null ? $data['uploadToken'] : null)
            ->withTemplateUploadUrl(array_key_exists('templateUploadUrl', $data) && $data['templateUploadUrl'] !== null ? $data['templateUploadUrl'] : null);
    }

    public function toJson(): array {
        return array(
            "uploadToken" => $this->getUploadToken(),
            "templateUploadUrl" => $this->getTemplateUploadUrl(),
        );
    }
}