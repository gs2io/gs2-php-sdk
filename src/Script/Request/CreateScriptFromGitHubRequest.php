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
 * Request for createScriptFromGitHub: Create script from code in the GitHub repository
 *
 * @see https://docs.gs2.io/api_reference/script/sdk/#createscriptfromgithub
 */
class CreateScriptFromGitHubRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Script name */
    private $name;
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
     * @return CreateScriptFromGitHubRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateScriptFromGitHubRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Script name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Script name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Script name
     * @return CreateScriptFromGitHubRequest
     */
	public function withName(?string $name): CreateScriptFromGitHubRequest {
		$this->name = $name;
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
     * @return CreateScriptFromGitHubRequest
     */
	public function withDescription(?string $description): CreateScriptFromGitHubRequest {
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
     * @return CreateScriptFromGitHubRequest
     */
	public function withCheckoutSetting(?GitHubCheckoutSetting $checkoutSetting): CreateScriptFromGitHubRequest {
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
     * @return CreateScriptFromGitHubRequest
     */
	public function withDisableStringNumberToNumber(?bool $disableStringNumberToNumber): CreateScriptFromGitHubRequest {
		$this->disableStringNumberToNumber = $disableStringNumberToNumber;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateScriptFromGitHubRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateScriptFromGitHubRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withCheckoutSetting(array_key_exists('checkoutSetting', $data) && $data['checkoutSetting'] !== null ? GitHubCheckoutSetting::fromJson($data['checkoutSetting']) : null)
            ->withDisableStringNumberToNumber(array_key_exists('disableStringNumberToNumber', $data) ? $data['disableStringNumberToNumber'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "checkoutSetting" => $this->getCheckoutSetting() !== null ? $this->getCheckoutSetting()->toJson() : null,
            "disableStringNumberToNumber" => $this->getDisableStringNumberToNumber(),
        );
    }
}