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

namespace Gs2\Identifier\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for detachGuard: Remove GS2-Guard Namespace GRN from the credential
 *
 * @see https://docs.gs2.io/api_reference/identifier/sdk/#detachguard
 */
class DetachGuardRequest extends Gs2BasicRequest {
    /** @var string GS2-Identifier User name */
    private $userName;
    /** @var string Client ID */
    private $clientId;
    /** @var string GS2-Guard Namespace GRN */
    private $guardNamespaceId;
    /** @return string|null GS2-Identifier User name */
	public function getUserName(): ?string {
		return $this->userName;
	}
    /** @param string|null $userName GS2-Identifier User name */
	public function setUserName(?string $userName) {
		$this->userName = $userName;
	}
    /**
     * @param string|null $userName GS2-Identifier User name
     * @return DetachGuardRequest
     */
	public function withUserName(?string $userName): DetachGuardRequest {
		$this->userName = $userName;
		return $this;
	}
    /** @return string|null Client ID */
	public function getClientId(): ?string {
		return $this->clientId;
	}
    /** @param string|null $clientId Client ID */
	public function setClientId(?string $clientId) {
		$this->clientId = $clientId;
	}
    /**
     * @param string|null $clientId Client ID
     * @return DetachGuardRequest
     */
	public function withClientId(?string $clientId): DetachGuardRequest {
		$this->clientId = $clientId;
		return $this;
	}
    /** @return string|null GS2-Guard Namespace GRN */
	public function getGuardNamespaceId(): ?string {
		return $this->guardNamespaceId;
	}
    /** @param string|null $guardNamespaceId GS2-Guard Namespace GRN */
	public function setGuardNamespaceId(?string $guardNamespaceId) {
		$this->guardNamespaceId = $guardNamespaceId;
	}
    /**
     * @param string|null $guardNamespaceId GS2-Guard Namespace GRN
     * @return DetachGuardRequest
     */
	public function withGuardNamespaceId(?string $guardNamespaceId): DetachGuardRequest {
		$this->guardNamespaceId = $guardNamespaceId;
		return $this;
	}

    public static function fromJson(?array $data): ?DetachGuardRequest {
        if ($data === null) {
            return null;
        }
        return (new DetachGuardRequest())
            ->withUserName(array_key_exists('userName', $data) && $data['userName'] !== null ? $data['userName'] : null)
            ->withClientId(array_key_exists('clientId', $data) && $data['clientId'] !== null ? $data['clientId'] : null)
            ->withGuardNamespaceId(array_key_exists('guardNamespaceId', $data) && $data['guardNamespaceId'] !== null ? $data['guardNamespaceId'] : null);
    }

    public function toJson(): array {
        return array(
            "userName" => $this->getUserName(),
            "clientId" => $this->getClientId(),
            "guardNamespaceId" => $this->getGuardNamespaceId(),
        );
    }
}