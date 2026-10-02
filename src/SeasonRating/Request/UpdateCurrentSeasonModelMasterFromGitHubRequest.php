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

namespace Gs2\SeasonRating\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\SeasonRating\Model\GitHubCheckoutSetting;

/**
 * Request for updateCurrentSeasonModelMasterFromGitHub: Update currently active Season Model master data from GitHub
 *
 * @see https://docs.gs2.io/api_reference/season_rating/sdk/#updatecurrentseasonmodelmasterfromgithub
 */
class UpdateCurrentSeasonModelMasterFromGitHubRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var GitHubCheckoutSetting Setting for checking out master data from GitHub */
    private $checkoutSetting;
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
     * @return UpdateCurrentSeasonModelMasterFromGitHubRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateCurrentSeasonModelMasterFromGitHubRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return GitHubCheckoutSetting|null Setting for checking out master data from GitHub */
	public function getCheckoutSetting(): ?GitHubCheckoutSetting {
		return $this->checkoutSetting;
	}
    /** @param GitHubCheckoutSetting|null $checkoutSetting Setting for checking out master data from GitHub */
	public function setCheckoutSetting(?GitHubCheckoutSetting $checkoutSetting) {
		$this->checkoutSetting = $checkoutSetting;
	}
    /**
     * @param GitHubCheckoutSetting|null $checkoutSetting Setting for checking out master data from GitHub
     * @return UpdateCurrentSeasonModelMasterFromGitHubRequest
     */
	public function withCheckoutSetting(?GitHubCheckoutSetting $checkoutSetting): UpdateCurrentSeasonModelMasterFromGitHubRequest {
		$this->checkoutSetting = $checkoutSetting;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateCurrentSeasonModelMasterFromGitHubRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateCurrentSeasonModelMasterFromGitHubRequest())
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