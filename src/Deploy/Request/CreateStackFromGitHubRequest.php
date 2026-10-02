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

namespace Gs2\Deploy\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Deploy\Model\GitHubCheckoutSetting;

/**
 * Request for createStackFromGitHub: Create Stack from GitHub
 *
 * @see https://docs.gs2.io/api_reference/deploy/sdk/#createstackfromgithub
 */
class CreateStackFromGitHubRequest extends Gs2BasicRequest {
    /** @var string Stack name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var GitHubCheckoutSetting Setup to check out template file from GitHub */
    private $checkoutSetting;
    /** @return string|null Stack name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Stack name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Stack name
     * @return CreateStackFromGitHubRequest
     */
	public function withName(?string $name): CreateStackFromGitHubRequest {
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
     * @return CreateStackFromGitHubRequest
     */
	public function withDescription(?string $description): CreateStackFromGitHubRequest {
		$this->description = $description;
		return $this;
	}
    /** @return GitHubCheckoutSetting|null Setup to check out template file from GitHub */
	public function getCheckoutSetting(): ?GitHubCheckoutSetting {
		return $this->checkoutSetting;
	}
    /** @param GitHubCheckoutSetting|null $checkoutSetting Setup to check out template file from GitHub */
	public function setCheckoutSetting(?GitHubCheckoutSetting $checkoutSetting) {
		$this->checkoutSetting = $checkoutSetting;
	}
    /**
     * @param GitHubCheckoutSetting|null $checkoutSetting Setup to check out template file from GitHub
     * @return CreateStackFromGitHubRequest
     */
	public function withCheckoutSetting(?GitHubCheckoutSetting $checkoutSetting): CreateStackFromGitHubRequest {
		$this->checkoutSetting = $checkoutSetting;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateStackFromGitHubRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateStackFromGitHubRequest())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withCheckoutSetting(array_key_exists('checkoutSetting', $data) && $data['checkoutSetting'] !== null ? GitHubCheckoutSetting::fromJson($data['checkoutSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "checkoutSetting" => $this->getCheckoutSetting() !== null ? $this->getCheckoutSetting()->toJson() : null,
        );
    }
}