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

namespace Gs2\Buff\Model;

use Gs2\Core\Model\IModel;


class BuffTargetGrn implements IModel {
	/**
     * @var string
	 */
	private $targetModelName;
	/**
     * @var string
	 */
	private $targetGrn;
	public function getTargetModelName(): ?string {
		return $this->targetModelName;
	}
	public function setTargetModelName(?string $targetModelName) {
		$this->targetModelName = $targetModelName;
	}
	public function withTargetModelName(?string $targetModelName): BuffTargetGrn {
		$this->targetModelName = $targetModelName;
		return $this;
	}
	public function getTargetGrn(): ?string {
		return $this->targetGrn;
	}
	public function setTargetGrn(?string $targetGrn) {
		$this->targetGrn = $targetGrn;
	}
	public function withTargetGrn(?string $targetGrn): BuffTargetGrn {
		$this->targetGrn = $targetGrn;
		return $this;
	}

    public static function fromJson(?array $data): ?BuffTargetGrn {
        if ($data === null) {
            return null;
        }
        return (new BuffTargetGrn())
            ->withTargetModelName(array_key_exists('targetModelName', $data) && $data['targetModelName'] !== null ? $data['targetModelName'] : null)
            ->withTargetGrn(array_key_exists('targetGrn', $data) && $data['targetGrn'] !== null ? $data['targetGrn'] : null);
    }

    public function toJson(): array {
        return array(
            "targetModelName" => $this->getTargetModelName(),
            "targetGrn" => $this->getTargetGrn(),
        );
    }
}