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

namespace Gs2\Grade\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class SubGradeRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $gradeName;
    /** @var string */
    private $propertyId;
    /** @var int */
    private $gradeValue;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): SubGradeRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): SubGradeRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getGradeName(): ?string {
		return $this->gradeName;
	}
	public function setGradeName(?string $gradeName) {
		$this->gradeName = $gradeName;
	}
	public function withGradeName(?string $gradeName): SubGradeRequest {
		$this->gradeName = $gradeName;
		return $this;
	}
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
	public function withPropertyId(?string $propertyId): SubGradeRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
	public function getGradeValue(): ?int {
		return $this->gradeValue;
	}
	public function setGradeValue(?int $gradeValue) {
		$this->gradeValue = $gradeValue;
	}
	public function withGradeValue(?int $gradeValue): SubGradeRequest {
		$this->gradeValue = $gradeValue;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SubGradeRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SubGradeRequest {
        if ($data === null) {
            return null;
        }
        return (new SubGradeRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withGradeName(array_key_exists('gradeName', $data) && $data['gradeName'] !== null ? $data['gradeName'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withGradeValue(array_key_exists('gradeValue', $data) && $data['gradeValue'] !== null ? $data['gradeValue'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "gradeName" => $this->getGradeName(),
            "propertyId" => $this->getPropertyId(),
            "gradeValue" => $this->getGradeValue(),
        );
    }
}