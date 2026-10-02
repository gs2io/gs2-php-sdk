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


/**
 * GRN pattern that identifies the resources used as conditions for applying buffs
 *
 * @see https://docs.gs2.io/api_reference/buff/sdk/#bufftargetgrn
 */
class BuffTargetGrn implements IModel {
	/**
     * @var string Buff application condition model name
	 */
	private $targetModelName;
	/**
     * @var string Buff application condition GRN
	 */
	private $targetGrn;
    /** @return string|null Buff application condition model name */
	public function getTargetModelName(): ?string {
		return $this->targetModelName;
	}
    /** @param string|null $targetModelName Buff application condition model name */
	public function setTargetModelName(?string $targetModelName) {
		$this->targetModelName = $targetModelName;
	}
    /**
     * @param string|null $targetModelName Buff application condition model name
     * @return BuffTargetGrn
     */
	public function withTargetModelName(?string $targetModelName): BuffTargetGrn {
		$this->targetModelName = $targetModelName;
		return $this;
	}
    /** @return string|null Buff application condition GRN */
	public function getTargetGrn(): ?string {
		return $this->targetGrn;
	}
    /** @param string|null $targetGrn Buff application condition GRN */
	public function setTargetGrn(?string $targetGrn) {
		$this->targetGrn = $targetGrn;
	}
    /**
     * @param string|null $targetGrn Buff application condition GRN
     * @return BuffTargetGrn
     */
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