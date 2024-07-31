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

class DoTakeOverOpenIdConnectRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var int */
    private $type;
    /** @var string */
    private $idToken;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): DoTakeOverOpenIdConnectRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getType(): ?int {
		return $this->type;
	}
	public function setType(?int $type) {
		$this->type = $type;
	}
	public function withType(?int $type): DoTakeOverOpenIdConnectRequest {
		$this->type = $type;
		return $this;
	}
	public function getIdToken(): ?string {
		return $this->idToken;
	}
	public function setIdToken(?string $idToken) {
		$this->idToken = $idToken;
	}
	public function withIdToken(?string $idToken): DoTakeOverOpenIdConnectRequest {
		$this->idToken = $idToken;
		return $this;
	}

    public static function fromJson(?array $data): ?DoTakeOverOpenIdConnectRequest {
        if ($data === null) {
            return null;
        }
        return (new DoTakeOverOpenIdConnectRequest())
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