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

namespace Gs2\SkillTree\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class UpdateCurrentTreeMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $settings;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateCurrentTreeMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getSettings(): ?string {
		return $this->settings;
	}
	public function setSettings(?string $settings) {
		$this->settings = $settings;
	}
	public function withSettings(?string $settings): UpdateCurrentTreeMasterRequest {
		$this->settings = $settings;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateCurrentTreeMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateCurrentTreeMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withSettings(array_key_exists('settings', $data) && $data['settings'] !== null ? $data['settings'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "settings" => $this->getSettings(),
        );
    }
}