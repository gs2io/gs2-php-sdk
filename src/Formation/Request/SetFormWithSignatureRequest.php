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

namespace Gs2\Formation\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Formation\Model\SlotWithSignature;

class SetFormWithSignatureRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $moldModelName;
    /** @var int */
    private $index;
    /** @var array */
    private $slots;
    /** @var string */
    private $keyId;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): SetFormWithSignatureRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): SetFormWithSignatureRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getMoldModelName(): ?string {
		return $this->moldModelName;
	}
	public function setMoldModelName(?string $moldModelName) {
		$this->moldModelName = $moldModelName;
	}
	public function withMoldModelName(?string $moldModelName): SetFormWithSignatureRequest {
		$this->moldModelName = $moldModelName;
		return $this;
	}
	public function getIndex(): ?int {
		return $this->index;
	}
	public function setIndex(?int $index) {
		$this->index = $index;
	}
	public function withIndex(?int $index): SetFormWithSignatureRequest {
		$this->index = $index;
		return $this;
	}
	public function getSlots(): ?array {
		return $this->slots;
	}
	public function setSlots(?array $slots) {
		$this->slots = $slots;
	}
	public function withSlots(?array $slots): SetFormWithSignatureRequest {
		$this->slots = $slots;
		return $this;
	}
	public function getKeyId(): ?string {
		return $this->keyId;
	}
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
	public function withKeyId(?string $keyId): SetFormWithSignatureRequest {
		$this->keyId = $keyId;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SetFormWithSignatureRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SetFormWithSignatureRequest {
        if ($data === null) {
            return null;
        }
        return (new SetFormWithSignatureRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withMoldModelName(array_key_exists('moldModelName', $data) && $data['moldModelName'] !== null ? $data['moldModelName'] : null)
            ->withIndex(array_key_exists('index', $data) && $data['index'] !== null ? $data['index'] : null)
            ->withSlots(!array_key_exists('slots', $data) || $data['slots'] === null ? null : array_map(
                function ($item) {
                    return SlotWithSignature::fromJson($item);
                },
                $data['slots']
            ))
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "moldModelName" => $this->getMoldModelName(),
            "index" => $this->getIndex(),
            "slots" => $this->getSlots() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getSlots()
            ),
            "keyId" => $this->getKeyId(),
        );
    }
}