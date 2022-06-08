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

namespace Gs2\Dictionary\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Dictionary\Model\GitHubCheckoutSetting;

class UpdateCurrentEntryMasterFromGitHubRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var GitHubCheckoutSetting */
    private $checkoutSetting;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateCurrentEntryMasterFromGitHubRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getCheckoutSetting(): ?GitHubCheckoutSetting {
		return $this->checkoutSetting;
	}
	public function setCheckoutSetting(?GitHubCheckoutSetting $checkoutSetting) {
		$this->checkoutSetting = $checkoutSetting;
	}
	public function withCheckoutSetting(?GitHubCheckoutSetting $checkoutSetting): UpdateCurrentEntryMasterFromGitHubRequest {
		$this->checkoutSetting = $checkoutSetting;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateCurrentEntryMasterFromGitHubRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateCurrentEntryMasterFromGitHubRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withCheckoutSetting(array_key_exists('checkoutSetting', $data) && $data['checkoutSetting'] !== null ? GitHubCheckoutSetting::fromJson($data['checkoutSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "checkoutSetting" => $this->getCheckoutSetting() !== null ? $this->getCheckoutSetting()->toJson() : null,
        );
    }
}