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
 * Request for deleteIdentifier: Delete credential
 *
 * @see https://docs.gs2.io/api_reference/identifier/sdk/#deleteidentifier
 */
class DeleteIdentifierRequest extends Gs2BasicRequest {
    /** @var string User Name */
    private $userName;
    /** @var string Client ID */
    private $clientId;
    /** @return string|null User Name */
	public function getUserName(): ?string {
		return $this->userName;
	}
    /** @param string|null $userName User Name */
	public function setUserName(?string $userName) {
		$this->userName = $userName;
	}
    /**
     * @param string|null $userName User Name
     * @return DeleteIdentifierRequest
     */
	public function withUserName(?string $userName): DeleteIdentifierRequest {
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
     * @return DeleteIdentifierRequest
     */
	public function withClientId(?string $clientId): DeleteIdentifierRequest {
		$this->clientId = $clientId;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteIdentifierRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteIdentifierRequest())
            ->withUserName(array_key_exists('userName', $data) && $data['userName'] !== null ? $data['userName'] : null)
            ->withClientId(array_key_exists('clientId', $data) && $data['clientId'] !== null ? $data['clientId'] : null);
    }

    public function toJson(): array {
        return array(
            "userName" => $this->getUserName(),
            "clientId" => $this->getClientId(),
        );
    }
}