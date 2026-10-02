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

namespace Gs2\Script\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Script\Model\GitHubCheckoutSetting;

/**
 * Request for updateScriptFromGitHub: Update scripts using GitHub as a data source
 *
 * @see https://docs.gs2.io/api_reference/script/sdk/#updatescriptfromgithub
 */
class UpdateScriptFromGitHubRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Script name */
    private $scriptName;
    /** @var string Description */
    private $description;
    /** @var GitHubCheckoutSetting Setup to check out source code from GitHub */
    private $checkoutSetting;
    /** @var bool Disable String-Number Conversion */
    private $disableStringNumberToNumber;
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
     * @return UpdateScriptFromGitHubRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateScriptFromGitHubRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Script name */
	public function getScriptName(): ?string {
		return $this->scriptName;
	}
    /** @param string|null $scriptName Script name */
	public function setScriptName(?string $scriptName) {
		$this->scriptName = $scriptName;
	}
    /**
     * @param string|null $scriptName Script name
     * @return UpdateScriptFromGitHubRequest
     */
	public function withScriptName(?string $scriptName): UpdateScriptFromGitHubRequest {
		$this->scriptName = $scriptName;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return UpdateScriptFromGitHubRequest
     */
	public function withDescription(?string $description): UpdateScriptFromGitHubRequest {
		$this->description = $description;
		return $this;
	}
    /** @return GitHubCheckoutSetting|null Setup to check out source code from GitHub */
	public function getCheckoutSetting(): ?GitHubCheckoutSetting {
		return $this->checkoutSetting;
	}
    /** @param GitHubCheckoutSetting|null $checkoutSetting Setup to check out source code from GitHub */
	public function setCheckoutSetting(?GitHubCheckoutSetting $checkoutSetting) {
		$this->checkoutSetting = $checkoutSetting;
	}
    /**
     * @param GitHubCheckoutSetting|null $checkoutSetting Setup to check out source code from GitHub
     * @return UpdateScriptFromGitHubRequest
     */
	public function withCheckoutSetting(?GitHubCheckoutSetting $checkoutSetting): UpdateScriptFromGitHubRequest {
		$this->checkoutSetting = $checkoutSetting;
		return $this;
	}
    /** @return bool|null Disable String-Number Conversion */
	public function getDisableStringNumberToNumber(): ?bool {
		return $this->disableStringNumberToNumber;
	}
    /** @param bool|null $disableStringNumberToNumber Disable String-Number Conversion */
	public function setDisableStringNumberToNumber(?bool $disableStringNumberToNumber) {
		$this->disableStringNumberToNumber = $disableStringNumberToNumber;
	}
    /**
     * @param bool|null $disableStringNumberToNumber Disable String-Number Conversion
     * @return UpdateScriptFromGitHubRequest
     */
	public function withDisableStringNumberToNumber(?bool $disableStringNumberToNumber): UpdateScriptFromGitHubRequest {
		$this->disableStringNumberToNumber = $disableStringNumberToNumber;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateScriptFromGitHubRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateScriptFromGitHubRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withScriptName(array_key_exists('scriptName', $data) && $data['scriptName'] !== null ? $data['scriptName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withCheckoutSetting(array_key_exists('checkoutSetting', $data) && $data['checkoutSetting'] !== null ? GitHubCheckoutSetting::fromJson($data['checkoutSetting']) : null)
            ->withDisableStringNumberToNumber(array_key_exists('disableStringNumberToNumber', $data) ? $data['disableStringNumberToNumber'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "scriptName" => $this->getScriptName(),
            "description" => $this->getDescription(),
            "checkoutSetting" => $this->getCheckoutSetting() !== null ? $this->getCheckoutSetting()->toJson() : null,
            "disableStringNumberToNumber" => $this->getDisableStringNumberToNumber(),
        );
    }
}