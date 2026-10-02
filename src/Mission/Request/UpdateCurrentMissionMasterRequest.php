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

namespace Gs2\Mission\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for updateCurrentMissionMaster: Update currently active Mission Model master data
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#updatecurrentmissionmaster
 */
class UpdateCurrentMissionMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Update mode */
    private $mode;
    /** @var string Master Data */
    private $settings;
    /** @var string Token obtained by pre-upload */
    private $uploadToken;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return UpdateCurrentMissionMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateCurrentMissionMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Update mode */
	public function getMode(): ?string {
		return $this->mode;
	}
    /** @param string|null $mode Update mode */
	public function setMode(?string $mode) {
		$this->mode = $mode;
	}
    /**
     * @param string|null $mode Update mode
     * @return UpdateCurrentMissionMasterRequest
     */
	public function withMode(?string $mode): UpdateCurrentMissionMasterRequest {
		$this->mode = $mode;
		return $this;
	}
    /** @return string|null Master Data */
	public function getSettings(): ?string {
		return $this->settings;
	}
    /** @param string|null $settings Master Data */
	public function setSettings(?string $settings) {
		$this->settings = $settings;
	}
    /**
     * @param string|null $settings Master Data
     * @return UpdateCurrentMissionMasterRequest
     */
	public function withSettings(?string $settings): UpdateCurrentMissionMasterRequest {
		$this->settings = $settings;
		return $this;
	}
    /** @return string|null Token obtained by pre-upload */
	public function getUploadToken(): ?string {
		return $this->uploadToken;
	}
    /** @param string|null $uploadToken Token obtained by pre-upload */
	public function setUploadToken(?string $uploadToken) {
		$this->uploadToken = $uploadToken;
	}
    /**
     * @param string|null $uploadToken Token obtained by pre-upload
     * @return UpdateCurrentMissionMasterRequest
     */
	public function withUploadToken(?string $uploadToken): UpdateCurrentMissionMasterRequest {
		$this->uploadToken = $uploadToken;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateCurrentMissionMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateCurrentMissionMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withMode(array_key_exists('mode', $data) && $data['mode'] !== null ? $data['mode'] : null)
            ->withSettings(array_key_exists('settings', $data) && $data['settings'] !== null ? $data['settings'] : null)
            ->withUploadToken(array_key_exists('uploadToken', $data) && $data['uploadToken'] !== null ? $data['uploadToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "mode" => $this->getMode(),
            "settings" => $this->getSettings(),
            "uploadToken" => $this->getUploadToken(),
        );
    }
}