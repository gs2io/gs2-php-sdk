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

/**
 * Request for getGradeModelMaster: Get Grade Model Master
 *
 * @see https://docs.gs2.io/api_reference/grade/sdk/#getgrademodelmaster
 */
class GetGradeModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Grade Model name */
    private $gradeName;
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
     * @return GetGradeModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): GetGradeModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Grade Model name */
	public function getGradeName(): ?string {
		return $this->gradeName;
	}
    /** @param string|null $gradeName Grade Model name */
	public function setGradeName(?string $gradeName) {
		$this->gradeName = $gradeName;
	}
    /**
     * @param string|null $gradeName Grade Model name
     * @return GetGradeModelMasterRequest
     */
	public function withGradeName(?string $gradeName): GetGradeModelMasterRequest {
		$this->gradeName = $gradeName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetGradeModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new GetGradeModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withGradeName(array_key_exists('gradeName', $data) && $data['gradeName'] !== null ? $data['gradeName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "gradeName" => $this->getGradeName(),
        );
    }
}