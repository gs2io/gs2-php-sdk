<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Matchmaking\Control;

use Gs2\Core\Control\Gs2UserRequest;

/**
 * @author Game Server Services, Inc.
 */
class CustomAutoDoMatchmakingRequest extends Gs2UserRequest {

    const FUNCTION = "DoMatchmaking";

	/** @var string マッチメイキングの名前を指定します。 */
	private $matchmakingName;

	/** @var int ギャザリングを新規作成する場合の属性値1 */
	private $attribute1;

	/** @var int ギャザリングを新規作成する場合の属性値2 */
	private $attribute2;

	/** @var int ギャザリングを新規作成する場合の属性値3 */
	private $attribute3;

	/** @var int ギャザリングを新規作成する場合の属性値4 */
	private $attribute4;

	/** @var int ギャザリングを新規作成する場合の属性値5 */
	private $attribute5;

	/** @var int 既存のギャザリングに参加する対象とする属性値1の最小値 */
	private $searchAttribute1Min;

	/** @var int 既存のギャザリングに参加する対象とする属性値2の最小値 */
	private $searchAttribute2Min;

	/** @var int 既存のギャザリングに参加する対象とする属性値3の最小値 */
	private $searchAttribute3Min;

	/** @var int 既存のギャザリングに参加する対象とする属性値4の最小値 */
	private $searchAttribute4Min;

	/** @var int 既存のギャザリングに参加する対象とする属性値5の最小値 */
	private $searchAttribute5Min;

	/** @var int 既存のギャザリングに参加する対象とする属性値1の最大値 */
	private $searchAttribute1Max;

	/** @var int 既存のギャザリングに参加する対象とする属性値2の最大値 */
	private $searchAttribute2Max;

	/** @var int 既存のギャザリングに参加する対象とする属性値3の最大値 */
	private $searchAttribute3Max;

	/** @var int 既存のギャザリングに参加する対象とする属性値4の最大値 */
	private $searchAttribute4Max;

	/** @var int 既存のギャザリングに参加する対象とする属性値5の最大値 */
	private $searchAttribute5Max;

	/** @var string 中断された検索を再開するためのコンテキスト */
	private $searchContext;


	/**
	 * マッチメイキングの名前を指定します。を取得
	 *
	 * @return string マッチメイキングの名前を指定します。
	 */
	public function getMatchmakingName() {
		return $this->matchmakingName;
	}

	/**
	 * マッチメイキングの名前を指定します。を設定
	 *
	 * @param string $matchmakingName マッチメイキングの名前を指定します。
	 */
	public function setMatchmakingName($matchmakingName) {
		$this->matchmakingName = $matchmakingName;
	}

	/**
	 * マッチメイキングの名前を指定します。を設定
	 *
	 * @param string $matchmakingName マッチメイキングの名前を指定します。
	 * @return CustomAutoDoMatchmakingRequest
	 */
	public function withMatchmakingName($matchmakingName): CustomAutoDoMatchmakingRequest {
		$this->setMatchmakingName($matchmakingName);
		return $this;
	}

	/**
	 * ギャザリングを新規作成する場合の属性値1を取得
	 *
	 * @return int ギャザリングを新規作成する場合の属性値1
	 */
	public function getAttribute1() {
		return $this->attribute1;
	}

	/**
	 * ギャザリングを新規作成する場合の属性値1を設定
	 *
	 * @param int $attribute1 ギャザリングを新規作成する場合の属性値1
	 */
	public function setAttribute1($attribute1) {
		$this->attribute1 = $attribute1;
	}

	/**
	 * ギャザリングを新規作成する場合の属性値1を設定
	 *
	 * @param int $attribute1 ギャザリングを新規作成する場合の属性値1
	 * @return CustomAutoDoMatchmakingRequest
	 */
	public function withAttribute1($attribute1): CustomAutoDoMatchmakingRequest {
		$this->setAttribute1($attribute1);
		return $this;
	}

	/**
	 * ギャザリングを新規作成する場合の属性値2を取得
	 *
	 * @return int ギャザリングを新規作成する場合の属性値2
	 */
	public function getAttribute2() {
		return $this->attribute2;
	}

	/**
	 * ギャザリングを新規作成する場合の属性値2を設定
	 *
	 * @param int $attribute2 ギャザリングを新規作成する場合の属性値2
	 */
	public function setAttribute2($attribute2) {
		$this->attribute2 = $attribute2;
	}

	/**
	 * ギャザリングを新規作成する場合の属性値2を設定
	 *
	 * @param int $attribute2 ギャザリングを新規作成する場合の属性値2
	 * @return CustomAutoDoMatchmakingRequest
	 */
	public function withAttribute2($attribute2): CustomAutoDoMatchmakingRequest {
		$this->setAttribute2($attribute2);
		return $this;
	}

	/**
	 * ギャザリングを新規作成する場合の属性値3を取得
	 *
	 * @return int ギャザリングを新規作成する場合の属性値3
	 */
	public function getAttribute3() {
		return $this->attribute3;
	}

	/**
	 * ギャザリングを新規作成する場合の属性値3を設定
	 *
	 * @param int $attribute3 ギャザリングを新規作成する場合の属性値3
	 */
	public function setAttribute3($attribute3) {
		$this->attribute3 = $attribute3;
	}

	/**
	 * ギャザリングを新規作成する場合の属性値3を設定
	 *
	 * @param int $attribute3 ギャザリングを新規作成する場合の属性値3
	 * @return CustomAutoDoMatchmakingRequest
	 */
	public function withAttribute3($attribute3): CustomAutoDoMatchmakingRequest {
		$this->setAttribute3($attribute3);
		return $this;
	}

	/**
	 * ギャザリングを新規作成する場合の属性値4を取得
	 *
	 * @return int ギャザリングを新規作成する場合の属性値4
	 */
	public function getAttribute4() {
		return $this->attribute4;
	}

	/**
	 * ギャザリングを新規作成する場合の属性値4を設定
	 *
	 * @param int $attribute4 ギャザリングを新規作成する場合の属性値4
	 */
	public function setAttribute4($attribute4) {
		$this->attribute4 = $attribute4;
	}

	/**
	 * ギャザリングを新規作成する場合の属性値4を設定
	 *
	 * @param int $attribute4 ギャザリングを新規作成する場合の属性値4
	 * @return CustomAutoDoMatchmakingRequest
	 */
	public function withAttribute4($attribute4): CustomAutoDoMatchmakingRequest {
		$this->setAttribute4($attribute4);
		return $this;
	}

	/**
	 * ギャザリングを新規作成する場合の属性値5を取得
	 *
	 * @return int ギャザリングを新規作成する場合の属性値5
	 */
	public function getAttribute5() {
		return $this->attribute5;
	}

	/**
	 * ギャザリングを新規作成する場合の属性値5を設定
	 *
	 * @param int $attribute5 ギャザリングを新規作成する場合の属性値5
	 */
	public function setAttribute5($attribute5) {
		$this->attribute5 = $attribute5;
	}

	/**
	 * ギャザリングを新規作成する場合の属性値5を設定
	 *
	 * @param int $attribute5 ギャザリングを新規作成する場合の属性値5
	 * @return CustomAutoDoMatchmakingRequest
	 */
	public function withAttribute5($attribute5): CustomAutoDoMatchmakingRequest {
		$this->setAttribute5($attribute5);
		return $this;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値1の最小値を取得
	 *
	 * @return int 既存のギャザリングに参加する対象とする属性値1の最小値
	 */
	public function getSearchAttribute1Min() {
		return $this->searchAttribute1Min;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値1の最小値を設定
	 *
	 * @param int $searchAttribute1Min 既存のギャザリングに参加する対象とする属性値1の最小値
	 */
	public function setSearchAttribute1Min($searchAttribute1Min) {
		$this->searchAttribute1Min = $searchAttribute1Min;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値1の最小値を設定
	 *
	 * @param int $searchAttribute1Min 既存のギャザリングに参加する対象とする属性値1の最小値
	 * @return CustomAutoDoMatchmakingRequest
	 */
	public function withSearchAttribute1Min($searchAttribute1Min): CustomAutoDoMatchmakingRequest {
		$this->setSearchAttribute1Min($searchAttribute1Min);
		return $this;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値2の最小値を取得
	 *
	 * @return int 既存のギャザリングに参加する対象とする属性値2の最小値
	 */
	public function getSearchAttribute2Min() {
		return $this->searchAttribute2Min;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値2の最小値を設定
	 *
	 * @param int $searchAttribute2Min 既存のギャザリングに参加する対象とする属性値2の最小値
	 */
	public function setSearchAttribute2Min($searchAttribute2Min) {
		$this->searchAttribute2Min = $searchAttribute2Min;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値2の最小値を設定
	 *
	 * @param int $searchAttribute2Min 既存のギャザリングに参加する対象とする属性値2の最小値
	 * @return CustomAutoDoMatchmakingRequest
	 */
	public function withSearchAttribute2Min($searchAttribute2Min): CustomAutoDoMatchmakingRequest {
		$this->setSearchAttribute2Min($searchAttribute2Min);
		return $this;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値3の最小値を取得
	 *
	 * @return int 既存のギャザリングに参加する対象とする属性値3の最小値
	 */
	public function getSearchAttribute3Min() {
		return $this->searchAttribute3Min;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値3の最小値を設定
	 *
	 * @param int $searchAttribute3Min 既存のギャザリングに参加する対象とする属性値3の最小値
	 */
	public function setSearchAttribute3Min($searchAttribute3Min) {
		$this->searchAttribute3Min = $searchAttribute3Min;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値3の最小値を設定
	 *
	 * @param int $searchAttribute3Min 既存のギャザリングに参加する対象とする属性値3の最小値
	 * @return CustomAutoDoMatchmakingRequest
	 */
	public function withSearchAttribute3Min($searchAttribute3Min): CustomAutoDoMatchmakingRequest {
		$this->setSearchAttribute3Min($searchAttribute3Min);
		return $this;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値4の最小値を取得
	 *
	 * @return int 既存のギャザリングに参加する対象とする属性値4の最小値
	 */
	public function getSearchAttribute4Min() {
		return $this->searchAttribute4Min;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値4の最小値を設定
	 *
	 * @param int $searchAttribute4Min 既存のギャザリングに参加する対象とする属性値4の最小値
	 */
	public function setSearchAttribute4Min($searchAttribute4Min) {
		$this->searchAttribute4Min = $searchAttribute4Min;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値4の最小値を設定
	 *
	 * @param int $searchAttribute4Min 既存のギャザリングに参加する対象とする属性値4の最小値
	 * @return CustomAutoDoMatchmakingRequest
	 */
	public function withSearchAttribute4Min($searchAttribute4Min): CustomAutoDoMatchmakingRequest {
		$this->setSearchAttribute4Min($searchAttribute4Min);
		return $this;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値5の最小値を取得
	 *
	 * @return int 既存のギャザリングに参加する対象とする属性値5の最小値
	 */
	public function getSearchAttribute5Min() {
		return $this->searchAttribute5Min;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値5の最小値を設定
	 *
	 * @param int $searchAttribute5Min 既存のギャザリングに参加する対象とする属性値5の最小値
	 */
	public function setSearchAttribute5Min($searchAttribute5Min) {
		$this->searchAttribute5Min = $searchAttribute5Min;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値5の最小値を設定
	 *
	 * @param int $searchAttribute5Min 既存のギャザリングに参加する対象とする属性値5の最小値
	 * @return CustomAutoDoMatchmakingRequest
	 */
	public function withSearchAttribute5Min($searchAttribute5Min): CustomAutoDoMatchmakingRequest {
		$this->setSearchAttribute5Min($searchAttribute5Min);
		return $this;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値1の最大値を取得
	 *
	 * @return int 既存のギャザリングに参加する対象とする属性値1の最大値
	 */
	public function getSearchAttribute1Max() {
		return $this->searchAttribute1Max;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値1の最大値を設定
	 *
	 * @param int $searchAttribute1Max 既存のギャザリングに参加する対象とする属性値1の最大値
	 */
	public function setSearchAttribute1Max($searchAttribute1Max) {
		$this->searchAttribute1Max = $searchAttribute1Max;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値1の最大値を設定
	 *
	 * @param int $searchAttribute1Max 既存のギャザリングに参加する対象とする属性値1の最大値
	 * @return CustomAutoDoMatchmakingRequest
	 */
	public function withSearchAttribute1Max($searchAttribute1Max): CustomAutoDoMatchmakingRequest {
		$this->setSearchAttribute1Max($searchAttribute1Max);
		return $this;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値2の最大値を取得
	 *
	 * @return int 既存のギャザリングに参加する対象とする属性値2の最大値
	 */
	public function getSearchAttribute2Max() {
		return $this->searchAttribute2Max;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値2の最大値を設定
	 *
	 * @param int $searchAttribute2Max 既存のギャザリングに参加する対象とする属性値2の最大値
	 */
	public function setSearchAttribute2Max($searchAttribute2Max) {
		$this->searchAttribute2Max = $searchAttribute2Max;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値2の最大値を設定
	 *
	 * @param int $searchAttribute2Max 既存のギャザリングに参加する対象とする属性値2の最大値
	 * @return CustomAutoDoMatchmakingRequest
	 */
	public function withSearchAttribute2Max($searchAttribute2Max): CustomAutoDoMatchmakingRequest {
		$this->setSearchAttribute2Max($searchAttribute2Max);
		return $this;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値3の最大値を取得
	 *
	 * @return int 既存のギャザリングに参加する対象とする属性値3の最大値
	 */
	public function getSearchAttribute3Max() {
		return $this->searchAttribute3Max;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値3の最大値を設定
	 *
	 * @param int $searchAttribute3Max 既存のギャザリングに参加する対象とする属性値3の最大値
	 */
	public function setSearchAttribute3Max($searchAttribute3Max) {
		$this->searchAttribute3Max = $searchAttribute3Max;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値3の最大値を設定
	 *
	 * @param int $searchAttribute3Max 既存のギャザリングに参加する対象とする属性値3の最大値
	 * @return CustomAutoDoMatchmakingRequest
	 */
	public function withSearchAttribute3Max($searchAttribute3Max): CustomAutoDoMatchmakingRequest {
		$this->setSearchAttribute3Max($searchAttribute3Max);
		return $this;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値4の最大値を取得
	 *
	 * @return int 既存のギャザリングに参加する対象とする属性値4の最大値
	 */
	public function getSearchAttribute4Max() {
		return $this->searchAttribute4Max;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値4の最大値を設定
	 *
	 * @param int $searchAttribute4Max 既存のギャザリングに参加する対象とする属性値4の最大値
	 */
	public function setSearchAttribute4Max($searchAttribute4Max) {
		$this->searchAttribute4Max = $searchAttribute4Max;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値4の最大値を設定
	 *
	 * @param int $searchAttribute4Max 既存のギャザリングに参加する対象とする属性値4の最大値
	 * @return CustomAutoDoMatchmakingRequest
	 */
	public function withSearchAttribute4Max($searchAttribute4Max): CustomAutoDoMatchmakingRequest {
		$this->setSearchAttribute4Max($searchAttribute4Max);
		return $this;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値5の最大値を取得
	 *
	 * @return int 既存のギャザリングに参加する対象とする属性値5の最大値
	 */
	public function getSearchAttribute5Max() {
		return $this->searchAttribute5Max;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値5の最大値を設定
	 *
	 * @param int $searchAttribute5Max 既存のギャザリングに参加する対象とする属性値5の最大値
	 */
	public function setSearchAttribute5Max($searchAttribute5Max) {
		$this->searchAttribute5Max = $searchAttribute5Max;
	}

	/**
	 * 既存のギャザリングに参加する対象とする属性値5の最大値を設定
	 *
	 * @param int $searchAttribute5Max 既存のギャザリングに参加する対象とする属性値5の最大値
	 * @return CustomAutoDoMatchmakingRequest
	 */
	public function withSearchAttribute5Max($searchAttribute5Max): CustomAutoDoMatchmakingRequest {
		$this->setSearchAttribute5Max($searchAttribute5Max);
		return $this;
	}

	/**
	 * 中断された検索を再開するためのコンテキストを取得
	 *
	 * @return string 中断された検索を再開するためのコンテキスト
	 */
	public function getSearchContext() {
		return $this->searchContext;
	}

	/**
	 * 中断された検索を再開するためのコンテキストを設定
	 *
	 * @param string $searchContext 中断された検索を再開するためのコンテキスト
	 */
	public function setSearchContext($searchContext) {
		$this->searchContext = $searchContext;
	}

	/**
	 * 中断された検索を再開するためのコンテキストを設定
	 *
	 * @param string $searchContext 中断された検索を再開するためのコンテキスト
	 * @return CustomAutoDoMatchmakingRequest
	 */
	public function withSearchContext($searchContext): CustomAutoDoMatchmakingRequest {
		$this->setSearchContext($searchContext);
		return $this;
	}

}