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

namespace Gs2\Exchange\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Exchange\Model\Config;

class AcquireRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $rateName;
    /** @var string */
    private $awaitName;
    /** @var array */
    private $config;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): AcquireRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getAccessToken(): ?string {
		return $this->accessToken;
	}

	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}

	public function withAccessToken(?string $accessToken): AcquireRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

	public function getRateName(): ?string {
		return $this->rateName;
	}

	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}

	public function withRateName(?string $rateName): AcquireRequest {
		$this->rateName = $rateName;
		return $this;
	}

	public function getAwaitName(): ?string {
		return $this->awaitName;
	}

	public function setAwaitName(?string $awaitName) {
		$this->awaitName = $awaitName;
	}

	public function withAwaitName(?string $awaitName): AcquireRequest {
		$this->awaitName = $awaitName;
		return $this;
	}

	public function getConfig(): ?array {
		return $this->config;
	}

	public function setConfig(?array $config) {
		$this->config = $config;
	}

	public function withConfig(?array $config): AcquireRequest {
		$this->config = $config;
		return $this;
	}

    public static function fromJson(?array $data): ?AcquireRequest {
        if ($data === null) {
            return null;
        }
        return (new AcquireRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withAccessToken(empty($data['accessToken']) ? null : $data['accessToken'])
            ->withRateName(empty($data['rateName']) ? null : $data['rateName'])
            ->withAwaitName(empty($data['awaitName']) ? null : $data['awaitName'])
            ->withConfig(array_map(
                function ($item) {
                    return Config::fromJson($item);
                },
                array_key_exists('config', $data) && $data['config'] !== null ? $data['config'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "rateName" => $this->getRateName(),
            "awaitName" => $this->getAwaitName(),
            "config" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConfig() !== null && $this->getConfig() !== null ? $this->getConfig() : []
            ),
        );
    }
}