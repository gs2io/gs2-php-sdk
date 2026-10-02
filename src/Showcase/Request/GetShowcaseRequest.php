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

namespace Gs2\Showcase\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getShowcase: Get Showcase
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#getshowcase
 */
class GetShowcaseRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Showcase name */
    private $showcaseName;
    /** @var string User ID */
    private $accessToken;
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
     * @return GetShowcaseRequest
     */
	public function withNamespaceName(?string $namespaceName): GetShowcaseRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Showcase name */
	public function getShowcaseName(): ?string {
		return $this->showcaseName;
	}
    /** @param string|null $showcaseName Showcase name */
	public function setShowcaseName(?string $showcaseName) {
		$this->showcaseName = $showcaseName;
	}
    /**
     * @param string|null $showcaseName Showcase name
     * @return GetShowcaseRequest
     */
	public function withShowcaseName(?string $showcaseName): GetShowcaseRequest {
		$this->showcaseName = $showcaseName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return GetShowcaseRequest
     */
	public function withAccessToken(?string $accessToken): GetShowcaseRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetShowcaseRequest {
        if ($data === null) {
            return null;
        }
        return (new GetShowcaseRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withShowcaseName(array_key_exists('showcaseName', $data) && $data['showcaseName'] !== null ? $data['showcaseName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "showcaseName" => $this->getShowcaseName(),
            "accessToken" => $this->getAccessToken(),
        );
    }
}