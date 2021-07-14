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

class CreateScriptFromGitHubRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var GitHubCheckoutSetting */
    private $checkoutSetting;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): CreateScriptFromGitHubRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): CreateScriptFromGitHubRequest {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): CreateScriptFromGitHubRequest {
		$this->description = $description;
		return $this;
	}

	public function getCheckoutSetting(): ?GitHubCheckoutSetting {
		return $this->checkoutSetting;
	}

	public function setCheckoutSetting(?GitHubCheckoutSetting $checkoutSetting) {
		$this->checkoutSetting = $checkoutSetting;
	}

	public function withCheckoutSetting(?GitHubCheckoutSetting $checkoutSetting): CreateScriptFromGitHubRequest {
		$this->checkoutSetting = $checkoutSetting;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateScriptFromGitHubRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateScriptFromGitHubRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withCheckoutSetting(empty($data['checkoutSetting']) ? null : GitHubCheckoutSetting::fromJson($data['checkoutSetting']));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "checkoutSetting" => $this->getCheckoutSetting() !== null ? $this->getCheckoutSetting()->toJson() : null,
        );
    }
}