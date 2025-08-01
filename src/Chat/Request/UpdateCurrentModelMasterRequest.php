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

namespace Gs2\Chat\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class UpdateCurrentModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $mode;
    /** @var string */
    private $settings;
    /** @var string */
    private $uploadToken;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateCurrentModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getMode(): ?string {
		return $this->mode;
	}
	public function setMode(?string $mode) {
		$this->mode = $mode;
	}
	public function withMode(?string $mode): UpdateCurrentModelMasterRequest {
		$this->mode = $mode;
		return $this;
	}
	public function getSettings(): ?string {
		return $this->settings;
	}
	public function setSettings(?string $settings) {
		$this->settings = $settings;
	}
	public function withSettings(?string $settings): UpdateCurrentModelMasterRequest {
		$this->settings = $settings;
		return $this;
	}
	public function getUploadToken(): ?string {
		return $this->uploadToken;
	}
	public function setUploadToken(?string $uploadToken) {
		$this->uploadToken = $uploadToken;
	}
	public function withUploadToken(?string $uploadToken): UpdateCurrentModelMasterRequest {
		$this->uploadToken = $uploadToken;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateCurrentModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateCurrentModelMasterRequest())
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