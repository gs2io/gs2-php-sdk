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

namespace Gs2\Account\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for previewTakeOverOpenIdConnect: Preview Account Takeover using OpenID Connect
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#previewtakeoveropenidconnect
 */
class PreviewTakeOverOpenIdConnectRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var int Slot Number */
    private $type;
    /** @var string OpenID Connect ID Token */
    private $idToken;
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
     * @return PreviewTakeOverOpenIdConnectRequest
     */
	public function withNamespaceName(?string $namespaceName): PreviewTakeOverOpenIdConnectRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return int|null Slot Number */
	public function getType(): ?int {
		return $this->type;
	}
    /** @param int|null $type Slot Number */
	public function setType(?int $type) {
		$this->type = $type;
	}
    /**
     * @param int|null $type Slot Number
     * @return PreviewTakeOverOpenIdConnectRequest
     */
	public function withType(?int $type): PreviewTakeOverOpenIdConnectRequest {
		$this->type = $type;
		return $this;
	}
    /** @return string|null OpenID Connect ID Token */
	public function getIdToken(): ?string {
		return $this->idToken;
	}
    /** @param string|null $idToken OpenID Connect ID Token */
	public function setIdToken(?string $idToken) {
		$this->idToken = $idToken;
	}
    /**
     * @param string|null $idToken OpenID Connect ID Token
     * @return PreviewTakeOverOpenIdConnectRequest
     */
	public function withIdToken(?string $idToken): PreviewTakeOverOpenIdConnectRequest {
		$this->idToken = $idToken;
		return $this;
	}

    public static function fromJson(?array $data): ?PreviewTakeOverOpenIdConnectRequest {
        if ($data === null) {
            return null;
        }
        return (new PreviewTakeOverOpenIdConnectRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withIdToken(array_key_exists('idToken', $data) && $data['idToken'] !== null ? $data['idToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "type" => $this->getType(),
            "idToken" => $this->getIdToken(),
        );
    }
}