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

namespace Gs2\Enhance\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class GetProgressRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $rateName;
    /** @var string */
    private $progressName;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): GetProgressRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getAccessToken(): ?string {
		return $this->accessToken;
	}

	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}

	public function withAccessToken(?string $accessToken): GetProgressRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

	public function getRateName(): ?string {
		return $this->rateName;
	}

	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}

	public function withRateName(?string $rateName): GetProgressRequest {
		$this->rateName = $rateName;
		return $this;
	}

	public function getProgressName(): ?string {
		return $this->progressName;
	}

	public function setProgressName(?string $progressName) {
		$this->progressName = $progressName;
	}

	public function withProgressName(?string $progressName): GetProgressRequest {
		$this->progressName = $progressName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetProgressRequest {
        if ($data === null) {
            return null;
        }
        return (new GetProgressRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withRateName(array_key_exists('rateName', $data) && $data['rateName'] !== null ? $data['rateName'] : null)
            ->withProgressName(array_key_exists('progressName', $data) && $data['progressName'] !== null ? $data['progressName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "rateName" => $this->getRateName(),
            "progressName" => $this->getProgressName(),
        );
    }
}