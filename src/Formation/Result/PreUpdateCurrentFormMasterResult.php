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

namespace Gs2\Formation\Result;

use Gs2\Core\Model\IResult;

/**
 * Result of preUpdateCurrentFormMaster: Update Currently active Form Model master data (3-phase version)
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#preupdatecurrentformmaster
 */
class PreUpdateCurrentFormMasterResult implements IResult {
    /** @var string Token used to reflect results after upload */
    private $uploadToken;
    /** @var string URL used to upload */
    private $uploadUrl;

    /** @return string|null Token used to reflect results after upload */
	public function getUploadToken(): ?string {
		return $this->uploadToken;
	}

    /** @param string|null $uploadToken Token used to reflect results after upload */
	public function setUploadToken(?string $uploadToken) {
		$this->uploadToken = $uploadToken;
	}

    /**
     * @param string|null $uploadToken Token used to reflect results after upload
     * @return PreUpdateCurrentFormMasterResult
     */
	public function withUploadToken(?string $uploadToken): PreUpdateCurrentFormMasterResult {
		$this->uploadToken = $uploadToken;
		return $this;
	}

    /** @return string|null URL used to upload */
	public function getUploadUrl(): ?string {
		return $this->uploadUrl;
	}

    /** @param string|null $uploadUrl URL used to upload */
	public function setUploadUrl(?string $uploadUrl) {
		$this->uploadUrl = $uploadUrl;
	}

    /**
     * @param string|null $uploadUrl URL used to upload
     * @return PreUpdateCurrentFormMasterResult
     */
	public function withUploadUrl(?string $uploadUrl): PreUpdateCurrentFormMasterResult {
		$this->uploadUrl = $uploadUrl;
		return $this;
	}

    public static function fromJson(?array $data): ?PreUpdateCurrentFormMasterResult {
        if ($data === null) {
            return null;
        }
        return (new PreUpdateCurrentFormMasterResult())
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